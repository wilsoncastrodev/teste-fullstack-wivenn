export type ReservationResponseType = {
    id: number,
    due_date: string,
    status: string,
    book_id: number,
    created_at: string,
    updated_at: string
};

export type ReservationRequestType = {
    book_id?: number
    reservation_id?: number
}

export type ReservationStateType = {
    reservations: ReservationResponseType | any,
    errors: any,
    isLoading: boolean
};
