import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { ThemeStateType } from "../../types/themeType";

export const openNotification = createAsyncThunk("theme/openNotification", async (open: boolean) => {
    return open;
});

const initialState: ThemeStateType = {
    openSidebar: false,
};

export const themeSlice = createSlice({
    name: "theme",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(openNotification.fulfilled, (state, action) => {
            state.openSidebar = action.payload;
        });
    },
});

export default themeSlice.reducer;
