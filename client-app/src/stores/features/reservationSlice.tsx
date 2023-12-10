import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { ReservationRequestType, ReservationStateType } from "../../types/reservationType";
import { axiosErrorHandler } from "../../utils/errors";
import ReservationService from "../../services/reservationService";

export const createReservation = createAsyncThunk("reservation/createReservation", async (payload: ReservationRequestType, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await ReservationService.createReservation(payload);
        return data;
    } catch (err) {
        const error = axiosErrorHandler(err)
        return rejectWithValue(error);
    }
}
);

export const cancelReservation = createAsyncThunk("reservation/cancelReservation", async (payload: ReservationRequestType, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await ReservationService.cancelReservation(payload);
        return data;
    } catch (err) {
        const error = axiosErrorHandler(err)
        return rejectWithValue(error);
    }
}
);

export const clearReservation = createAsyncThunk("reservation/clearReservation", async () => {
    return null;
});

const initialState: ReservationStateType = {
    reservations: null,
    errors: null,
    isLoading: false,
};

export const reservationSlice = createSlice({
    name: "reservation",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(createReservation.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(createReservation.fulfilled, (state, action) => {
            state.reservations = action.payload;
            state.errors = null;
        });
        builder.addCase(createReservation.rejected, (state, action) => {
            state.errors = action.payload;
        });
        builder.addCase(cancelReservation.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(cancelReservation.fulfilled, (state, action) => {
            state.reservations = action.payload;
            state.errors = null;
        });
        builder.addCase(cancelReservation.rejected, (state, action) => {
            state.errors = action.payload;
        });
        builder.addCase(clearReservation.fulfilled, (state, action) => {
            state.reservations = action.payload;
            state.errors = null;
        });
    },
});

export default reservationSlice.reducer;
