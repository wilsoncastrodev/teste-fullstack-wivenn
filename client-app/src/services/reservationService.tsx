import { api } from '../config/api'
import { AxiosResponse } from "axios";
import { ReservationRequestType, ReservationResponseType } from '../types/reservationType';

const getAllReservation = (): Promise<AxiosResponse<ReservationResponseType>> => {
    return api.get<ReservationResponseType>('reservations')
}

const createReservation = (payload: ReservationRequestType): Promise<AxiosResponse<ReservationResponseType>> => {
    return api.post<ReservationResponseType>('reservations', payload)
}

const cancelReservation = (payload: ReservationRequestType): Promise<AxiosResponse<ReservationResponseType>> => {
    return api.patch<ReservationResponseType>(`reservations/${payload.book_id}`)
}

const ReservationService = {
    getAllReservation,
    createReservation,
    cancelReservation,
};

export default ReservationService;
