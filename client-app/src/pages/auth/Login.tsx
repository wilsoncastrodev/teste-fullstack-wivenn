import { FC, useEffect, useState } from "react";
import { Alert, Container } from "react-bootstrap";
import FormLogin from "../../components/forms/FormLogin";
import Logo from "../../components/logos/Logo";

const LoginPage: FC = () => {
    const [alert, setAlert] = useState<string>("");

    useEffect(() => {
        const _verified = new URLSearchParams(window.location.search).get('verificado');

        if (_verified === "0") {
            setAlert("error")
        }

        if (_verified === "1") {
            setAlert("success")
        }
    }, []);

    return (
        <Container className="auth-login">
            <div className="text-center">
                <Logo />
            </div>
            <div className="text-center mb-4">
                <span className="subtitle">Entre com o seu E-mail e Senha:</span>
                {
                    alert === "success" ? (
                        <Alert variant="success">
                            <div className="mb-2">
                                <strong>
                                    Parabéns! O processo de verificação do seu usuário foi concluído com sucesso.
                                    A partir de agora, você pode fazer login sempre que quiser, utilizando sua conta.
                                </strong>
                            </div>
                        </Alert>
                    ) : null
                }
                {
                    alert === "error" ? (
                        <Alert variant="danger">
                            <div className="mb-2">
                                <strong>
                                    Houve um problema com o link de verificação por e-mail. Se você estiver tendo
                                    dificuldades para verificar sua conta, entre em contato com a nossa equipe de suporte
                                    técnico através do e-mail <a href="mailto:contato@wivenn.com.br"><strong>contato@wivenn.com.br</strong></a>
                                </strong>
                            </div>
                        </Alert>
                    ) : null
                }

            </div>
            <FormLogin />
        </Container>
    )
}

export default LoginPage;
