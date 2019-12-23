export const login = credentials => {
    return new Promise((res, rej) => {
        axios
            .post("/api/auth/login", credentials)
            .then(response => res(response.data))
            .catch(err => rej("Wrong email or password"));
    });
};

export const register = credentials => {
    return new Promise((res, rej) => {
        axios
            .post("/api/auth/register", credentials)
            .then(response => res(response.data))
            .catch(err => rej("Wrong credentials"));
    });
};

export const getLocalUser = () => {
    const user = localStorage.getItem("user");
    if (!user) {
        return null;
    }
    return JSON.parse(user);
};
