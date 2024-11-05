// Initialize Quill editors
// var snow = new Quill("#snow", {
//     theme: "snow",
// });

var bubble = new Quill("#bubble", {
    theme: "bubble",
});

var full = new Quill("#full", {
    bounds: "#full-container .editor",
    modules: {
        toolbar: [
            [{ font: [] }, { size: [] }],
            ["bold", "italic", "underline", "strike"],
            [{ color: [] }, { background: [] }],
            [{ script: "super" }, { script: "sub" }],
            [
                { list: "ordered" },
                { list: "bullet" },
                { indent: "-1" },
                { indent: "+1" },
            ],
            ["direction", { align: [] }],
            ["link", "image", "video"],
            ["clean"],
        ],
    },
    theme: "snow",
});

const quill = new Quill('#service_description', {
    theme: 'snow'
});

// Capture the content of the Quill editor when the form is submitted
document.getElementById('serviceForm').addEventListener('submit', function () {
    const serviceDescriptionContent = quill.root.innerHTML; // Get the HTML content
    document.getElementById('service_description_input').value = serviceDescriptionContent; // Set it in the hidden input
});
