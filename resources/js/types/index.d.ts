export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

export interface Grade {
    id: number;
    value: number;
}

export interface Subject {
    id: number;
    title: string;
}

export interface Course {
    id: number;
    title: string;
    description: string;
    image: string;
    price: BigInteger;
    grade: Grade;
    subject: Subject;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
