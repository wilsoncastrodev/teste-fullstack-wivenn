import { api } from '../config/api';
import { AxiosResponse } from "axios";
import { BookRequestType, BookResponseType } from '../types/bookType';

const getAllBookPaginate = (): Promise<AxiosResponse<BookResponseType>> => {
    return api.get<BookResponseType>(`books/paginate/15`);
}

const searchBook = (payload: BookRequestType): Promise<AxiosResponse<BookResponseType>> => {
    return api.get<BookResponseType>(`books/search/${payload.query}`);
}

const getReservedBooksByUser = (): Promise<AxiosResponse<BookResponseType>> => {
    return api.get<BookResponseType>(`books/reserved`);
}


const BookService = {
    getAllBookPaginate,
    searchBook,
    getReservedBooksByUser
};

export default BookService;
