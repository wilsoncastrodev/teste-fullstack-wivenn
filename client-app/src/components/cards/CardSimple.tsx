import Button from "react-bootstrap/esm/Button";
import Card from "react-bootstrap/esm/Card";

const CardSimple = ({ item }: any) => {
    return (
        <a href="#">
            <Card className="card-simple">
                <img src={item.cover} alt={item.title} />
                <Card.Body className="card-body">
                    <Card.Title className="card-title">{item.title}</Card.Title>
                    <div className="card-author">
                        {item.author}
                    </div>
                </Card.Body>
                {
                    item.is_available ? <Button type="submit" className="btn-block">
                        Reservar
                    </Button> : <Button type="submit" className="btn-block disabled">
                        Indisponível
                    </Button>
                }
            </Card>
        </a>
    )
}

export default CardSimple;