function repeated(script: string) {
    const words = script.split(' ');
    const counts: { [key: string]: number } = {};

    for (let word of words) {
        counts[word] = (counts[word] || 0) + 1;
    }

    return counts;
}

console.log(repeated("hello book hell php js php jquery dom hello hello"));