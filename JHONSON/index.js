function getCharacters(done) {
      const results= fetch("https://rickandmortyapi.com/api/character");
       results
        .then(response=>response.json())
        .then(data=>{
        done(data);
      })
    }

   getCharacters(data => {
    data.results.forEach(personaje => {
        const article = document.createRange().createContextualFragment(`
            <article>
                <div class="Image_container">
                    <img src="${personaje.image}" alt="" style="width:100%">
                    <h2> ${personaje.name}</h2>
                </div>
            </article>
        `);

        const main = document.querySelector("main");
        main.append(article);
       });
    });