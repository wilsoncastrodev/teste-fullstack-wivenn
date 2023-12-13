import 'moment/locale/pt-br';
import { Button } from 'primereact/button';
import { Dialog } from 'primereact/dialog';
import { Fragment, useState } from "react";
import moment from 'moment';
import Row from "react-bootstrap/esm/Row";
import Col from 'react-bootstrap/esm/Col';
moment.locale('pt-br');

const DialogBook = ({ book }: any) => {
    const [visible, setVisible] = useState<boolean>(false);

    const footerContent = (
        <div>
            <Button label="Fechar" className="btn btn-primary" onClick={() => setVisible(false)} />
        </div>
    );

    return (
        <Fragment>
            <a href="!#" onClick={(e) => { e.preventDefault(); setVisible(true) }}>
                {book.title}
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
                    </Col>
                </Row>
            </Dialog>
        </Fragment>
    );
};

export default DialogBook;
