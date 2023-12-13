import { FC, useEffect, useState, Fragment } from "react";
import { DataTable } from 'primereact/datatable';
import { Column } from "primereact/column";
import { MDCSnackbar } from '@material/snackbar';
import { Card } from "react-bootstrap";
import { RootState, useAppDispatch, useAppSelector } from "../../../stores/store";
import { cancelReservationByLibrarian, getAllReservation } from "../../../stores/features/reservationSlice";
import moment from "moment";
import DialogBook from "../../../components/dialogs/DialogBook";


const SectionListReservation: FC = () => {
    const isLoading = useAppSelector((state: RootState) => state.reservation.isLoading);
    const reservations = useAppSelector((state: RootState) => state.reservation.reservations);
    const errors = useAppSelector((state: RootState) => state.reservation.errors);
    const dispatch = useAppDispatch();
    const [items, setItems] = useState<any>([]);

    useEffect(() => {
        dispatch(getAllReservation());
    }, [isLoading]);

    useEffect(() => {
        if(reservations)
            setItems(reservations);
    }, [errors, reservations, dispatch]);

    const cancel = (book_id: number) => {
        dispatch(cancelReservationByLibrarian({ "book_id": book_id }));
        const mdcSnackbar: any = document.querySelector(".mdc-snackbar-error");
        const snackbar = new MDCSnackbar(mdcSnackbar);
        snackbar.timeoutMs = 5000;
        snackbar.labelText = `A reserva foi cancelada com sucesso!`;
        snackbar.actionButtonText = "";
        snackbar.open();
    }

    const actionBodyTemplate = (data: any) => {
        return (
            <div className="text-center">
                {
                    data.status !== 'Cancelado' ?
                    <button onClick={() => cancel(data.id)} className="btn btn-outline-danger">Cancelar</button> : 
                    <span>---</span>
                }
            </div>
        );
    }

    const statusColorTemplate = (data: any) => {
        return data.status === 'Cancelado' ? 
            <span style={{ color: "#ed4758" }} >{data.status}</span> : 
            <span style={{ color: "#21bf48" }} >{data.status}</span>;
    }
    
    const dateFormatUTCTemplate = (data: any) => {
        return moment(data.created_at).format("DD/MM/YYYY");
    }

    const dateFormatTemplate = (data: any) => {
        return moment(data.due_date).format("DD/MM/YYYY");
    }
    
    const bookDialogTemplate = (data: any) => {
        return <DialogBook book={data.book} />;
    }

    return (
        <Fragment>
            {
                items && items.length > 0 ?
                    <Fragment>
                        <DataTable value={items} paginator rows={8} className="datatable-admin"
                            emptyMessage="Não foi encontrado nenhum resultado">
                            <Column field="id" header="#" />
                            <Column body={bookDialogTemplate} field="book.title" header="Livro" sortable />
                            <Column field="user.name" header="Nome do Usuário" sortable />
                            <Column field="user.email" header="E-mail do Usuário" sortable />
                            <Column body={statusColorTemplate} field="status" header="Status" sortable />
                            <Column body={dateFormatUTCTemplate} field="created_at" header="Data da Reserva" sortable />
                            <Column body={dateFormatTemplate} field="due_date" header="Data da Retirada" sortable />
                            <Column header="Ações" body={actionBodyTemplate} exportable={false} style={{ width: '150px' }} />
                        </DataTable>
                    </Fragment>
                    : <div className="pt-4">
                        <Card className="mt-5">
                            <Card.Body>Não há nenhuma Reserva cadastrada.</Card.Body>
                        </Card>
                    </div>
            }
        </Fragment>
    )
};

export default SectionListReservation;