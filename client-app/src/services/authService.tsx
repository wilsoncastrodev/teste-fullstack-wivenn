import { api } from '../config/api'
import { AxiosResponse } from "axios";
import { LoginRequestType, RegisterRequestType, AuthResponseType } from '../types/authType';

const login = (payload: LoginRequestType): Promise<AxiosResponse<AuthResponseType>> => {
    return api.post<AuthResponseType>('login', payload)
}

const register = (payload: RegisterRequestType): Promise<AxiosResponse<AuthResponseType>> => {
    return api.post<AuthResponseType>('register', payload)
}

const logout = (): Promise<AxiosResponse> => {
    return api.post('logout')
}

const AuthService = {
    login,
    register,
    logout
};

export default AuthService;
