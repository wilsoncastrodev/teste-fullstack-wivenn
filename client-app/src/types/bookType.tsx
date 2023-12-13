export type BookResponseType = {
    id: number,
    title: string;
    description: string;
    author: string;
    cover: string;
    publisher: string;
    isbn: string;
    pages: number;
    is_available: boolean;
    created_at: string,
    updated_at: string
};

export type BookRequestType = {
    query?: string
}

export type BookStateType = {
    books: BookResponseType | any,
    errors: any,
    isLoading: boolean
};
