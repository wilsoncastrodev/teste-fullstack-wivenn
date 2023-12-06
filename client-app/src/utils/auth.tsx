export const getToken = (): any => JSON.parse(localStorage.getItem('token')!);

export const setToken = (token: any): void => localStorage.setItem('token', JSON.stringify(token));

export const clearToken = (): void => localStorage.removeItem('token');

export const getRole = (): string => JSON.parse(localStorage.getItem('role')!);

export const setRole = (role: string): void => localStorage.setItem('role', JSON.stringify(role));

export const clearRole = (): void => localStorage.removeItem('role');