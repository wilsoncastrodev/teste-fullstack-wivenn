import { api } from '../config/api';
import { AxiosResponse } from "axios";
import { NotificationResponseType } from '../types/notificationType';

const getReservationsNotifiedLibrarian = (): Promise<AxiosResponse<NotificationResponseType>> => {
    return api.get<NotificationResponseType>('notifications/reservations/librarian')
}

const NotificationService = {
    getReservationsNotifiedLibrarian,
};

export default NotificationService;
