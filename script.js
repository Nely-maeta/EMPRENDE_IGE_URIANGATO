 // Función para cargar comentarios del localStorage
        function loadComments() {
            const comments = JSON.parse(localStorage.getItem('comments')) || [];
            const commentsDiv = document.getElementById('comments');
            commentsDiv.innerHTML = ''; // Limpiar contenido previo
            comments.forEach(comment => {
                const div = document.createElement('div');
                div.className = 'comment';
                div.textContent = comment;
                commentsDiv.appendChild(div);
            });
        }

        // Función para agregar un nuevo comentario
        function addComment() {
            const commentInput = document.getElementById('comment');
            const commentText = commentInput.value;

            if (commentText) {
                const comments = JSON.parse(localStorage.getItem('comments')) || [];
                comments.push(commentText);
                localStorage.setItem('comments', JSON.stringify(comments));

                commentInput.value = ''; // Limpiar el campo de texto
                loadComments(); // Recargar los comentarios
            } else {
                alert('Por favor, escribe un comentario.');
            }
        }

        // Cargar comentarios al inicio
        window.onload = loadComments;
