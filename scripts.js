const apiKey = '4a66c098587ea69b7de392f576a01e07';
const searchMovieURL = 'https://api.themoviedb.org/3/search/movie';

async function sortMovie(query) {
const finalURL = '${searchMovieURL}?api_key=${apiKey}&query=${encodeURI(query)}';

try {
 const repsonse = await fetch(finalURL);
if(!response.ok) {
    throw new Error('NOOO THERE WAS AN ERROR :( ');
}



} catch {

}

}