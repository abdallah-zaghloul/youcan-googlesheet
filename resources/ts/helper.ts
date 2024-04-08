export function dd(...args: any[]) {
    console.log(...args)
    return
}

export function match(key: string | number, conditions: Map<string | number, any>, defaultCondition: any) {
    return conditions.get(key) ?? defaultCondition;
}
