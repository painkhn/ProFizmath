export interface User {
    id: number;
    name: string;
    email: string;
    role: string;
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
    price: number;
    grade: Grade;
    subject: Subject;
    teacher: User;
    language: string;
    duration: string;
    course_format: string;
}

export interface CourseForm {
    title: string;
    description: string;
    price: string;
    course_format: string;
    language: string;
    duration: string;
    grade_id: string | number;
    subject_id: string | number;
    teacher_id: string | number;
    image: File | null;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
