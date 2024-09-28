function vowel(script: string) {
    let count: number = 0;
    const vowel = ['a', 'e', 'i', 'o', 'u', 'y'];

    for (let letter of script.toLowerCase()) {
        if (vowel.indexOf(letter) !== -1) {
            count += 1;
        }
    }

    return count;
}

console.log(vowel('be happy'));