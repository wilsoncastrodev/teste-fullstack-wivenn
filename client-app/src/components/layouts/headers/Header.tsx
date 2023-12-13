import { FC } from "react";
import { Col, Container, ListGroup, Row } from "react-bootstrap";
import { Link, useNavigate } from "react-router-dom";
import { logout } from "../../../stores/features/authSlice";
import { useAppDispatch } from "../../../stores/store";
import { clearRole, clearToken, getToken } from "../../../utils/auth";

const Header: FC = () => {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();

    const handleLogout = async () => {
        clearToken();
        clearRole();
        dispatch(logout());
        
        if (!getToken()) {
            navigate('/login');
        }
    }
    
    return (
        <header className="d-flex pb-0">
            <Container>
                <Row>
                    <Col sm={4}>
                        <h1 className="header-logo text-white text-center text-sm-start">
                            <Link className="text-white" to="/">
                                Wivenn
                            </Link>
                        </h1>
                    </Col>
                    <Col sm={4}>
                        <div className="menu-page d-lg-flex text-end h-100 justify-content-center">
                            <ListGroup horizontal>
                                <ListGroup.Item>
                                    <Link className="text-white" to="">
                                        Home
                                    </Link>
                                </ListGroup.Item>
                                <ListGroup.Item>
                                    <Link className="text-white" to="minhas-reservas">
                                        Minhas Reservas
                                    </Link>
                                </ListGroup.Item>
                                <ListGroup.Item>
                                    <a href="!#" className="text-white" onClick={(e) => { e.preventDefault(); handleLogout() }}>
                                        Sair
                                    </a>
                                </ListGroup.Item>
                            </ListGroup>
                        </div>
                    </Col>
                </Row>
            </Container>
        </header>
    )
};

export default Header;
