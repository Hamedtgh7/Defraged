function vowel(script) {
    var count = 0;
    var vowel = ['a', 'e', 'i', 'o', 'u', 'y'];
    for (var _i = 0, _a = script.toLowerCase(); _i < _a.length; _i++) {
        var letter = _a[_i];
        if (vowel.indexOf(letter) !== -1) {
            count += 1;
        }
    }
    return count;
}
console.log(vowel('be happy'));
