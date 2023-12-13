import 'moment/locale/pt-br';
import { Button } from 'primereact/button';
import { cancelReservationByUser, createReservation } from "../../stores/features/reservationSlice";
import { Dialog } from 'primereact/dialog';
import { Fragment, useState, useEffect} from "react";
import { useAppDispatch } from "../../stores/store";
import CardSimple from "../cards/CardSimple";
import Col from "react-bootstrap/esm/Col";
import moment from 'moment';
import Row from "react-bootstrap/esm/Row";
import { RootState, useAppSelector } from "../../stores/store";
moment.locale('pt-br');

const DialogReservation = ({ book, reserved = false }: any) => {
    const [visible, setVisible] = useState<boolean>(false);
    const [isAvailable, setIsAvailable] = useState<boolean>(true);
    const [isCanceled, setIsCanceled] = useState<boolean>(false);
    const dispatch = useAppDispatch();
    const reservations = useAppSelector((state: RootState) => state.reservation.reservations);

    const handleReservation = async (book_id: number) => {
        dispatch(createReservation({ "book_id": book_id }));
        setVisible(false)
    }

    const handleCancelReservation = async (reservation_id: number) => {
        dispatch(cancelReservationByUser({ "book_id": reservation_id }));
        setVisible(false)
    }

    const handleDialog = async (status: string, isCanceled: boolean) => {
        if ((status && status === 'Cancelado') || isCanceled) {
            setVisible(false)
        } else {
            setVisible(true)
        }
    }

    useEffect(() => {
        if (reservations) {
            if (reservations.book_id === book.id) {
                setIsAvailable(false);

                if (reservations.status === 'Cancelado') {
                    setIsCanceled(true);
                }
            }
        }
    }, [reservations]);

    const footerContent = (
        <div>
            {
                reserved && <Button label="Cancelar Reserva" className="btn btn-danger me-2" onClick={() => handleCancelReservation(book.reservation.id)} autoFocus />
            }
            {
                (!reserved && book.is_available) && isAvailable ? <Button label="Confirmar Reserva" className="btn btn-primary me-2" onClick={() => handleReservation(book.id)} autoFocus /> :
                    <Button label="Fechar" className="btn btn-primary" onClick={() => setVisible(false)} />
            }
        </div>
    );

    return (
        <Fragment>
            <a href="!#" onClick={(e) => { e.preventDefault(); handleDialog(book?.reservation?.status, isCanceled); }}>
                <CardSimple item={book} reserved={reserved} isAvailable={isAvailable} isCanceled={isCanceled} />
            </a>
            <Dialog
                header={'Livro: ' + book.title}
                visible={visible}
                style={{ width: '50vw' }}
                onHide={() => setVisible(false)}
                footer={footerContent}
                breakpoints={{ '960px': '75vw', '641px': '100vw' }}
            >
                <Row className="mb-3">
                    <Col sm={4}>
                        <img src={book.cover} alt={book.title} />
                    </Col>
                    <Col sm={8}>
                        <Row className="mb-3">
                            <Col>
                                <div><strong>Nome do Livro:</strong></div>
                                <div>{book.title}</div>
                            </Col>
                        </Row>
                        <Row className="mb-3">
                            <Col>
                                <div><strong>Autor do Livro:</strong></div>
                                <div>{book.author}</div>
                            </Col>
                        </Row>
                        <Row className="mb-3">
                            <Col>
                                <div><strong>Descrição:</strong></div>
                                <div className="text-limit">{book.description}</div>
                            </Col>
                        </Row>
                        <Row className="mb-3">
                            <Col>
                                <div><strong>Editora:</strong></div>
                                <div>{book.publisher}</div>
                            </Col>
                            <Col>
                                <div><strong>ISBN:</strong></div>
                                <div>{book.isbn}</div>
                            </Col>
                        </Row>
                        <Row className="mb-3">
                            <Col>
                                <div><strong>Quatidade de Páginas:</strong></div>
                                <div>{book.pages}</div>
                            </Col>
                        </Row>
                        <Row className="mb-3">
                            {
                                !book.is_available && !reserved && <Col>
                                    <strong style={{ color: "#ed4758" }}>No momento, a reserva deste livro encontra-se temporariamente indisponível.</strong>
                                </Col>
                            }
                            {
                                reserved && book.reservation && <Col>
                                    <strong style={{ color: "#0072ed" }}>O prazo para efetuar a retirada do livro expira na {moment(book.reservation.due_date).format('dddd')}, dia {moment(book.reservation.due_date).format('DD [de] MMMM [de] YYYY')}.</strong>
                                </Col>
                            }
                        </Row>
                    </Col>
                </Row>
            </Dialog>
        </Fragment>
    );
};

export default DialogReservation;
