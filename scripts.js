


function handleSubmit(event) {

    event.preventDefault();
    let nameyy = document.getElementById('inputOne').value;
    let num = document.getElementById('inputTwo').value;
    
    let newStr = nameyy.replace(/ /g, '+');
    
    
    
    //const url = `http://www.omdbapi.com/?apikey=${nameyy}&s=${encodeURIComponent(movieTitle)}`;
    const url2 = `http://www.omdbapi.com/?t=${newStr}&apikey=d2572b9b&y=${num}`;
    const encodedURL = url2
    
    
    fetch(encodedURL)
      .then(response => response.json())
      .then(data => {
        // All of the movie results will appear below.
        document.getElementById('titleOfMovie').textContent = "Movie Title: " + data.Title;
        document.getElementById('dateOfMovie').textContent = "Released on: " + data.Released;
        document.getElementById('directorOfMovie').textContent = "Director: " + data.Director;
        document.getElementById('writerOfMovie').textContent = "Writer: " + data.Writer;
        document.getElementById('contentOfMovie').textContent = "Plot of the Movie: " + data.Plot;
        document.getElementById('ratesOfMovie').textContent = "IMDB Average Rating: " + data.imdbRating + "/10";
        document.getElementById('lengthOfMovie').textContent = "Runtime: " + data.Runtime;
        document.getElementById('boxOfficeOfMovie').textContent = "Box Office: " + data.BoxOffice;
      })
      .catch(error => {
        console.error('Error:', error); // Handle any errors
      });


}
