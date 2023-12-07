import { useEffect } from "react";
import { useAppDispatch, useAppSelector, RootState } from "../../../../stores/store";
import SectionTitleLarge from "../../../../components/sections/SectionTitleLarge";
import { getAllBookPaginate } from "../../../../stores/features/bookSlice";
import Row from "react-bootstrap/esm/Row";
import Col from "react-bootstrap/esm/Col";
import CardSimple from "../../../../components/cards/CardSimple";
import { Container } from "react-bootstrap";

const SectionListBooks = () => {
    const books = useAppSelector((state: RootState) => state.book.books);
    const dispatch = useAppDispatch();

    useEffect(() => {
        dispatch(getAllBookPaginate());
    }, []);

    return (
        <section className="pt-4 text-center">
            <Container>
                {
                    books && books.length > 0 ?
                        <SectionTitleLarge title={"Explore os Nossos Livros"} /> :
                        <SectionTitleLarge title={"Não foi encontrado nenhum livro!"} />
                }
                <Row xs={5} className="gx-3 mt-5">
                    {books && books.length > 0 ? books.map((product: any, key: any) => (
                        <Col key={key} className="mb-4">
                            <CardSimple item={product} />
                        </Col>
                    )) : null}
                </Row>
            </Container>
        </section>
    )
}

export default SectionListBooks;