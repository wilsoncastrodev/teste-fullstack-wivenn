import { configureStore } from "@reduxjs/toolkit";
import authReducer from "./features/authSlice";
import bookReducer from "./features/bookSlice";
import reservationReducer from "./features/reservationSlice";
import { useDispatch, useSelector, TypedUseSelectorHook } from "react-redux";

const store = configureStore({
    reducer: {
        auth: authReducer,
        book: bookReducer,
        reservation: reservationReducer,
    },
    middleware: (getDefaultMiddleware) => getDefaultMiddleware(),
})

export type AppDispatch = typeof store.dispatch;
export type RootState = ReturnType<typeof store.getState>;

export const useAppDispatch: () => AppDispatch = useDispatch;
export const useAppSelector: TypedUseSelectorHook<RootState> = useSelector;

export default store;
