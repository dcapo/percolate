export default {
    snakeCaseToCapitalizedWords(string) {
        return string.split('_').map(word => {
            return word.charAt(0).toUpperCase() + word.slice(1);
        }).join(' ');
    }
};
