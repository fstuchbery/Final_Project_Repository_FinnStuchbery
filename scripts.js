


function handleSubmit(event) {

    event.preventDefault();
    let nameyy = document.getElementById('inputOne').value;
    let num = document.getElementById('inputTwo').value;
    const apiKey = 'd2572b9b'; // Replace with your actual API key
    const movieTitle = 'The Shining. '; // Replace with the title of the movie you want to search
    
    let newStr = nameyy.replace(/ /g, '+');
    
    
    
    //const url = `http://www.omdbapi.com/?apikey=${nameyy}&s=${encodeURIComponent(movieTitle)}`;
    const url2 = `http://www.omdbapi.com/?t=${newStr}&apikey=d2572b9b&y=${num}`;
    const encodedURL = url2
    
    
    fetch(encodedURL)
      .then(response => response.json())
      .then(data => {

        document.getElementById('titleOfMovie').textContent = "Movie Title: " + data.Title;
        document.getElementById('dateOfMovie').textContent = "Released on: " + data.Released;
        document.getElementById('directorOfMovie').textContent = "Director: " + data.Director;
        document.getElementById('writerOfMovie').textContent = "Writer: " + data.Writer;
        document.getElementById('contentOfMovie').textContent = "Plot of the Movie: " + data.Plot;
        document.getElementById('ratesOfMovie').textContent = "IMDB Average Rating: " + data.imdbRating + "/10";
        document.getElementById('lengthOfMovie').textContent = "Runtime: " + data.Runtime;
        document.getElementById('boxOfficeOfMovie').textContent = "Box Office: " + data.BoxOffice;
        console.log(data); // This will log the search results for "Inception"
      })
      .catch(error => {
        console.error('Error:', error); // Handle any errors
      });


}
