import { Formik } from "formik";
import Form from 'react-bootstrap/esm/Form';
import Button from 'react-bootstrap/esm/Button';
import { useAppDispatch } from "../../stores/store";
import { getAllBookPaginate, searchBook } from "../../stores/features/bookSlice";

const SearchBar = () => {
    const dispatch = useAppDispatch();

    const handleChange = (e: any, setFieldValue: any) => {
        const { name, value } = e.target;

        if (value.trim() === '') {
            dispatch(getAllBookPaginate());
        } 
        
        setFieldValue(name, value);
    };

    return (
        <div className="d-flex justify-content-center mt-3 mb-5 py-3">
            <Formik
                onSubmit={async (payload) => {
                    dispatch(searchBook(payload));
                }}
                initialValues={{
                    query: "",
                }}
            >
                {({ handleSubmit, values, setFieldValue }) => (
                    <Form onSubmit={handleSubmit} className="search">
                        <Form.Control
                            type="text"
                            placeholder="Buscar por Título, Autor ou ISBN"
                            name="query"
                            value={values.query}
                            onChange={(e) => handleChange(e, setFieldValue)}
                            autoComplete="off"
                            className="input"
                        />
                        <Button type="submit">
                            Buscar
                        </Button>
                    </Form>
                )}
            </Formik>
        </div>
    )
}

export default SearchBar;