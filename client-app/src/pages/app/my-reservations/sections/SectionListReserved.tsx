import { useEffect, useState } from "react";
import { useAppDispatch, useAppSelector, RootState } from "../../../../stores/store";
import SectionTitleLarge from "../../../../components/sections/SectionTitleLarge";
import { getReservedBooksByUser } from "../../../../stores/features/bookSlice";
import Row from "react-bootstrap/esm/Row";
import Col from "react-bootstrap/esm/Col";
import { Container } from "react-bootstrap";
import DialogReservation from "../../../../components/dialogs/DialogReservation";
import { clearReservation } from "../../../../stores/features/reservationSlice";
import { MDCSnackbar } from "@material/snackbar";

const SectionListReserved = () => {
    const books = useAppSelector((state: RootState) => state.book.books);
    const reservations = useAppSelector((state: RootState) => state.reservation.reservations);
    const [reserved] = useState<boolean>(true);
    const dispatch = useAppDispatch();

    useEffect(() => {
        dispatch(getReservedBooksByUser());
    }, []);

    useEffect(() => {
        if (reservations) {
            dispatch(clearReservation());
            const mdcSnackbar: any = document.querySelector(".mdc-snackbar-error");
            const snackbar = new MDCSnackbar(mdcSnackbar);
            snackbar.timeoutMs = 5000;
            snackbar.labelText = `A reserva foi cancelada com sucesso.`;
            snackbar.actionButtonText = "";
            snackbar.open();
        }
    }, [reservations]);

    return (
        <section className="pt-4 text-center">
            <Container>
                {
                    books && books.length > 0 ?
                        <SectionTitleLarge title={"Meus Livros Reservados"} /> :
                        <SectionTitleLarge title={"Ainda não há livros reservados"} />
                }
                <Row xs={5} className="gx-3 mt-5">
                    {
                        books && books.length > 0 ? books.map((book: any, key: any) => (
                            <Col key={key} className="mb-4">
                                <DialogReservation book={book} reserved={reserved} />
                            </Col>
                        )) : null
                    }
                </Row>
            </Container>
        </section>
    )
}

export default SectionListReserved;