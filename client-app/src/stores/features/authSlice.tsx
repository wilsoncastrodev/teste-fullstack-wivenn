import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { LoginRequestType, RegisterRequestType, AuthStateType } from "../../types/authType";
import { axiosErrorHandler } from "../../utils/errors";
import { clearRole, clearToken, setRole, setToken } from "../../utils/auth";
import AuthService from "../../services/authService";

export const login = createAsyncThunk("auth/login", async (payload: LoginRequestType, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await AuthService.login(payload);
        clearToken();
        clearRole();
        setRole(data.user.role);
        setToken(data.token);
        return data.user;
    } catch (err) {
        const error = axiosErrorHandler(err)
        return rejectWithValue(error);
    }
}
);

export const register = createAsyncThunk("auth/register", async (payload: RegisterRequestType, { rejectWithValue }) => {
    try {
        const { data: { data } }: any = await AuthService.register(payload);
        clearToken();
        clearRole();
        return data.user;
    } catch (err) {
        const error = axiosErrorHandler(err)
        return rejectWithValue(error);
    }
}
);

export const logout = createAsyncThunk("auth/logout", async (_, { rejectWithValue }) => {
    try {
        await AuthService.logout();
        return null;
    } catch (err) {
        const error = axiosErrorHandler(err)
        return rejectWithValue(error);
    }
});

const initialState: AuthStateType = {
    user: null,
    registered: false,
    errors: null,
    isLoading: false,
};

export const authSlice = createSlice({
    name: "auth",
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder.addCase(login.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(login.fulfilled, (state, action) => {
            state.user = action.payload;
            state.isLoading = false;
            state.errors = null;
        });
        builder.addCase(login.rejected, (state, action) => {
            state.errors = action.payload;
            state.isLoading = false;
        });
        builder.addCase(register.pending, (state) => {
            state.isLoading = true;
        });
        builder.addCase(register.fulfilled, (state, action) => {
            state.user = action.payload;
            state.registered = true;
            state.isLoading = false;
            state.errors = null;
        });
        builder.addCase(register.rejected, (state, action) => {
            state.errors = action.payload;
            state.isLoading = false;
        });
    },
});

export default authSlice.reducer;
