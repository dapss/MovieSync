<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieSync - Stream Instantly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #ffffff;
        }
        .custom-gradient {
            background: linear-gradient(45deg, #2c3e50, #3498db);
        }
        .input-glow:focus {
            box-shadow: 0 0 15px rgba(52, 152, 219, 0.5);
            border-color: #3498db;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="bg-[#121212] min-h-screen flex flex-col">
    <div class="container mx-auto px-4 py-8 flex-grow">
        <header class="text-center mb-12">
            <div class="flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-3 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 4h6v4H7V7zm8 0h2v4h-2V7zm-8 6h10v2H7v-2z" clip-rule="evenodd" />
                </svg>
                <h1 class="text-4xl font-bold text-white">MovieSync</h1>
            </div>
            <p class="text-gray-400 max-w-xl mx-auto">
            Lorem ipsum odor amet, consectetuer adipiscing elit.            </p>
        </header>

        <div class="max-w-2xl mx-auto bg-[#1e1e1e] rounded-2xl shadow-2xl p-8 card-hover">
            <form method="GET" class="mb-6">
                <div class="flex">
                    <input 
                        type="text" 
                        name="imdb" 
                        placeholder="" 
                        value="<?php echo htmlspecialchars($_GET['imdb'] ?? ''); ?>"
                        class="input-glow flex-grow px-5 py-3 bg-[#2c2c2c] text-white rounded-l-lg border border-transparent focus:outline-none transition duration-300"
                    >
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-r-lg transition duration-300 transform hover:scale-105"
                    >
                        Search
                    </button>
                </div>
            </form>

            <?php if(isset($_GET['imdb'])): ?>
                <div class="rounded-2xl overflow-hidden shadow-lg border-4 border-[#3498db]/30">
                    <div class="aspect-video">
                        <iframe 
                            src="https://vidsrc.me/embed/movie?imdb=<?php echo htmlspecialchars($_GET['imdb']); ?>" 
                            class="w-full h-full"
                            frameborder="0" 
                            referrerpolicy="origin" 
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <span class="bg-blue-600/20 text-blue-400 px-4 py-2 rounded-full text-sm">
                        Now Playing: <?php echo htmlspecialchars($_GET['imdb']); ?>
                    </span>
                </div>
            <?php else: ?>
                <div class="text-center bg-[#2c2c2c] rounded-2xl p-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto mb-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 4h6v4H7V7zm8 0h2v4h-2V7zm-8 6h10v2H7v-2z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-gray-400">
                    Lorem ipsum odor amet, consectetuer adipiscing elit.
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const imdbInput = document.querySelector('input[name="imdb"]');
            const imdbRegex = /^tt\d{7,8}$/;
            
            if (!imdbRegex.test(imdbInput.value)) {
                e.preventDefault();
                alert('Please enter a valid IMDB ID (e.g., tt5761544)');
            }
        });
    </script>
</body>
</html>