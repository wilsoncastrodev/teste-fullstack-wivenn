import { api } from '../config/api'
import { AxiosResponse } from "axios";
import { ReservationRequestType, ReservationResponseType } from '../types/reservationType';

const createReservation = (payload: ReservationRequestType): Promise<AxiosResponse<ReservationResponseType>> => {
    console.log(payload);
    return api.post<ReservationResponseType>('reservations', payload)
}

const cancelReservation = (payload: ReservationRequestType): Promise<AxiosResponse<ReservationResponseType>> => {
    return api.patch<ReservationResponseType>(`reservations/${payload.book_id}`)
}

const ReservationService = {
    createReservation,
    cancelReservation
};

export default ReservationService;
