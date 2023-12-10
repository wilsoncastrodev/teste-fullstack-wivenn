import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { BookRequestType, BookStateType } from "../../types/bookType";
import { axiosErrorHandler } from "../../utils/errors";
import BookService from "../../services/bookService";

export const getAllBookPaginate = createAsyncThunk("book/getAllBookPaginate", async (_, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await BookService.getAllBookPaginate();
        return data.data;
    } catch (err) {
            const error = axiosErrorHandler(err);
            return rejectWithValue(error);
        }
    }
);

export const searchBook = createAsyncThunk("book/searchBook", async (payload: BookRequestType, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await BookService.searchBook(payload);
        return data;
    } catch (err) {
        const error = axiosErrorHandler(err)
        return rejectWithValue(error);
    }
});

export const getReservedBooksByUser = createAsyncThunk("book/getReservedBooksByUser", async (_, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await BookService.getReservedBooksByUser();
        return data;
    } catch (err) {
            const error = axiosErrorHandler(err);
            return rejectWithValue(error);
        }
    }
);

const initialState: BookStateType = {
    books: null,
    errors: null,
    isLoading: false,
};

export const bookSlice = createSlice({
    name: "book",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(getAllBookPaginate.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(getAllBookPaginate.fulfilled, (state, action) => {
            state.books = action.payload;
            state.errors = null;
        });
        builder.addCase(getAllBookPaginate.rejected, (state, action) => {
            state.errors = action.payload;
        });
        builder.addCase(searchBook.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(searchBook.fulfilled, (state, action) => {
            state.books = action.payload;
            state.isLoading = false;
        });
        builder.addCase(searchBook.rejected, (state, action) => {
            state.errors = action.payload;
        });
        builder.addCase(getReservedBooksByUser.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(getReservedBooksByUser.fulfilled, (state, action) => {
            state.books = action.payload;
            state.isLoading = false;
            state.errors = null;
        });
        builder.addCase(getReservedBooksByUser.rejected, (state, action) => {
            state.errors = action.payload;
        });
    },
});

export default bookSlice.reducer;
