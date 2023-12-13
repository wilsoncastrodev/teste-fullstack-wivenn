import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { ReservationRequestType, ReservationStateType } from "../../types/reservationType";
import { axiosErrorHandler } from "../../utils/errors";
import ReservationService from "../../services/reservationService";

export const getAllReservation = createAsyncThunk("reservation/getAllReservation", async (_, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await ReservationService.getAllReservation();
        return data;
    } catch (err) {
            const error = axiosErrorHandler(err);
            return rejectWithValue(error);
        }
    }
);

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

export const cancelReservationByUser = createAsyncThunk("reservation/cancelReservationByUser", async (payload: ReservationRequestType, { rejectWithValue, dispatch }, ) => {
    try {
        const { data: { data } }: any = await ReservationService.cancelReservation(payload);
        return data;
    } catch (err) {
        const error = axiosErrorHandler(err)
        return rejectWithValue(error);
    }
}
);

export const cancelReservationByLibrarian = createAsyncThunk("reservation/cancelReservationByLibrarian", async (payload: ReservationRequestType, { rejectWithValue, dispatch }, ) => {
    try {
        const { data: { data } }: any = await ReservationService.cancelReservation(payload);
        dispatch(getAllReservation());
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
        builder.addCase(getAllReservation.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(getAllReservation.fulfilled, (state, action) => {
            state.reservations = action.payload;
            state.errors = null;
        });
        builder.addCase(getAllReservation.rejected, (state, action) => {
            state.errors = action.payload;
        });
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
        builder.addCase(cancelReservationByUser.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(cancelReservationByUser.fulfilled, (state, action) => {
            state.reservations = action.payload;
            state.errors = null;
        });
        builder.addCase(cancelReservationByUser.rejected, (state, action) => {
            state.errors = action.payload;
        });
        builder.addCase(cancelReservationByLibrarian.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(cancelReservationByLibrarian.fulfilled, (state) => {
            state.errors = null;
        });
        builder.addCase(cancelReservationByLibrarian.rejected, (state, action) => {
            state.errors = action.payload;
        });
        builder.addCase(clearReservation.fulfilled, (state, action) => {
            state.reservations = action.payload;
            state.errors = null;
        });
    },
});

export default reservationSlice.reducer;
