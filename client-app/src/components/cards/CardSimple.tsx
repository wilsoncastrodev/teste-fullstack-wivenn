import Button from "react-bootstrap/esm/Button";
import Card from "react-bootstrap/esm/Card";

const CardSimple = ({ item, reserved = false, isAvailable, isCanceled }: any) => {
    return (
        <Card className="card-simple">
            <img src={item.cover} alt={item.title} />
            <Card.Body className="card-body">
                <Card.Title className="card-title">{item.title}</Card.Title>
                <div className="card-author">
                    {item.author}
                </div>
            </Card.Body>
            {
                (item.is_available && isAvailable) && !reserved ? <Button className="btn-block">
                    Reservar
                </Button> : null
            }
            {
                (!item.is_available || !isAvailable) && !reserved ? <Button className="btn-block disabled">
                    Indisponível
                </Button> : null
            }
            {
                reserved && item?.reservation?.status !== "Cancelado" && !isCanceled ? <Button className="btn-block">
                    Ver Reserva
                </Button> : null
            }
            {
                (reserved && item?.reservation?.status === "Cancelado") || isCanceled ? <Button className="btn-block disabled">
                    Cancelado
                </Button> : null
            }
        </Card>
    )
}

export default CardSimple;