function repeated(script) {
    var words = script.split(' ');
    var counts = {};
    for (var _i = 0, words_1 = words; _i < words_1.length; _i++) {
        var word = words_1[_i];
        counts[word] = (counts[word] || 0) + 1;
    }
    return counts;
}
console.log(repeated("hello book hell php js php jquery dom hello hello"));
