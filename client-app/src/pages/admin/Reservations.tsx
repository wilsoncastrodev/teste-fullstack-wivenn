import { Container } from "react-bootstrap";
import SectionListReservation from "./sections/SectionListReservation";
import SectionTitleLargeAdmin from "../../components/sections/SectionTitleLargeAdmin";

const ReservationsPage = () => (
    <Container className="mt-4 pb-3 px-0 px-md-4">
        <SectionTitleLargeAdmin title={"Reservas de Livros"} />
        <SectionListReservation />
    </Container>
);

export default ReservationsPage;