import { FC, useEffect } from "react";
import { Container } from "react-bootstrap";
import Logo from "../../components/logos/Logo";
import { useAppSelector, RootState } from "../../stores/store";
import { useNavigate } from "react-router-dom";

const RegisterSuccess: FC = () => {
    const auth = useAppSelector((state: RootState) => state.auth);
    const navigate = useNavigate();

    useEffect(() => {
        if (!auth.registered) {
            navigate("/");
        }
    }, []);

    return (
        <Container className="auth-register mt-5">
            <div className="text-center mt-4">
                <Logo />
            </div>
            <div className="text-center mb-4">
                <span className="subtitle">Confirme seu E-mail</span>
            </div>
            <div className="mt-5 message-registered" style={{ fontSize: "1.4rem" }}>
                Acabamos de enviar um link de confirmação por e-mail para {auth?.user?.email}.
            </div>
        </Container>
    )
};

export default RegisterSuccess;