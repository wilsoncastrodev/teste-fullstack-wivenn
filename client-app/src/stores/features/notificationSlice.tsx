import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { NotificationStateType } from "../../types/notificationType";
import { axiosErrorHandler } from "../../utils/errors";
import NotificationService from "../../services/notificationService";

export const getReservationsNotifiedLibrarian = createAsyncThunk("notification/getReservationsNotifiedLibrarian", async (_, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await NotificationService.getReservationsNotifiedLibrarian();
        return data;
    } catch (err) {
            const error = axiosErrorHandler(err);
            return rejectWithValue(error);
        }
    }
);

const initialState: NotificationStateType = {
    notifications: null,
    errors: null,
    isLoading: false,
};

export const notificationSlice = createSlice({
    name: "notification",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(getReservationsNotifiedLibrarian.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(getReservationsNotifiedLibrarian.fulfilled, (state, action) => {
            state.notifications = action.payload;
            state.errors = null;
        });
        builder.addCase(getReservationsNotifiedLibrarian.rejected, (state, action) => {
            state.errors = action.payload;
        });
    },
});

export default notificationSlice.reducer;
