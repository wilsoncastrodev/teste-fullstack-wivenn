import { Col, Container, ListGroup, Row } from "react-bootstrap";
import { Link } from "react-router-dom";
import { useAppDispatch } from "../../../stores/store";
import { openNotification } from "../../../stores/features/themeSlice";
import { clearRole, clearToken, getToken } from "../../../utils/auth";
import { logout } from "../../../stores/features/authSlice";
import { useNavigate } from "react-router-dom";

const HeaderAdmin = () => {
    const dispatch = useAppDispatch();
    const navigate = useNavigate();
    
    const handleLogout = async () => {
        clearToken();
        clearRole();
        dispatch(logout());
        
        if (!getToken()) {
            navigate('/admin/login');
        }
    }
    
    return (
        <header className="d-flex pb-0 header-admin">
            <Container>
                <Row>
                    <Col sm={4}>
                        <h1 className="header-logo text-white text-center text-sm-start">
                            <Link className="text-white" to="/admin/reservas">
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
                                    <a href="!#" className="text-white" onClick={(e) => { e.preventDefault(); handleLogout() }}>
                                        Sair
                                    </a>
                                </ListGroup.Item>
                            </ListGroup>
                        </div>
                    </Col>
                    <Col sm={4}>
                        <div className="menu-page d-lg-flex h-100 justify-content-end">
                            <button className="btn btn-outline-primary" onClick={() => dispatch(openNotification(true))}>
                                Notificações
                            </button>
                        </div>
                    </Col>
                </Row>
            </Container>
        </header>
    )
};

export default HeaderAdmin;
