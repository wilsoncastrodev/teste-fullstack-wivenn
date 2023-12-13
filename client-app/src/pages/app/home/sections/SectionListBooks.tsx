import 'moment/locale/pt-br';
import { clearReservation } from "../../../../stores/features/reservationSlice";
import { Container } from "react-bootstrap";
import { getAllBookPaginate } from "../../../../stores/features/bookSlice";
import { MDCSnackbar } from "@material/snackbar";
import { useAppDispatch, useAppSelector, RootState } from "../../../../stores/store";
import { useEffect } from "react";
import Col from "react-bootstrap/esm/Col";
import DialogReservation from "../../../../components/dialogs/DialogReservation";
import moment from 'moment';
import Row from "react-bootstrap/esm/Row";
import SectionTitleLarge from "../../../../components/sections/SectionTitleLarge";
moment.locale('pt-br');

const SectionListBooks = () => {
    const books = useAppSelector((state: RootState) => state.book.books);
    const reservations = useAppSelector((state: RootState) => state.reservation.reservations);
    const errors = useAppSelector((state: RootState) => state.reservation.errors);
    const dispatch = useAppDispatch();

    useEffect(() => {
        if (reservations && reservations.hasOwnProperty('id')) {
            dispatch(clearReservation());
            const mdcSnackbar: any = document.querySelector(".mdc-snackbar");
            const snackbar = new MDCSnackbar(mdcSnackbar);
            snackbar.timeoutMs = 10000;
            snackbar.labelText = `A reserva foi concluída com sucesso. O prazo limite para
                                  retirada do livro é até ${moment(reservations.due_date).format('dddd')}, dia 
                                  ${moment(reservations.due_date).format('DD [de] MMMM [de] YYYY')}.`;
            snackbar.actionButtonText = "";
            snackbar.open();
        }
    }, [reservations]);

    useEffect(() => {
        if (errors) {
            dispatch(clearReservation());
            const mdcSnackbar: any = document.querySelector(".mdc-snackbar-error");
            const snackbar = new MDCSnackbar(mdcSnackbar);
            snackbar.timeoutMs = 5000;
            snackbar.labelText = errors.message;
            snackbar.actionButtonText = "";
            snackbar.open();
        }
    }, [errors]);

    useEffect(() => {
        dispatch(getAllBookPaginate());
    }, []);

    return (
        <section className="pt-4 text-center">
            <Container>
                {
                    books && books.length > 0 &&
                        <SectionTitleLarge title={"Explore os Nossos Livros"} />
                }
                <Row xs={5} className="gx-3 mt-5">
                    {books && books.length > 0 ? books.map((book: any, key: any) => (
                        <Col key={key} className="mb-4">
                            <DialogReservation book={book} />
                        </Col>
                    )) : null}
                </Row>
            </Container>
        </section>
    )
}

export default SectionListBooks;