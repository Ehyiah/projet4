// INITIALISATION CAROUSEL
    $(document).ready(function(){
        $('.carousel').carousel({
            duration : 300,
            fullWidth : true,
            indicators : true,
        });
    });

// INITIALISATION SLIDER
    $(document).ready(function(){
        $('.slider').slider();
    });

// INITIALISATION MENU RESPONSIVE
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });

// INITIALISATION menu dropdown
    $(document).ready(function(){
        $(".dropdown-trigger").dropdown({hover: false});
    });

// INITIALISATION COLLAPSE PAGE LOGIN
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });

// INITIALISATION TINYMCE
    tinymce.init({
        selector: '#mytextarea',
        language: 'fr_FR',
        browser_spellcheck: true,
        contextmenu: false,
        height : 600,

        style_formats: [
            {title: "Headers", items: [
                {title: "Header 1", format: "h1"},
                {title: "Header 2", format: "h2"},
                {title: "Header 3", format: "h3"},
                {title: "Header 4", format: "h4"},
                {title: "Header 5", format: "h5"},
                {title: "Header 6", format: "h6"}
            ]},
            {title: "Inline", items: [
                {title: "Bold", icon: "bold", format: "bold"},
                {title: "Italic", icon: "italic", format: "italic"},
                {title: "Underline", icon: "underline", format: "underline"},
                {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                {title: "Superscript", icon: "superscript", format: "superscript"},
                {title: "Subscript", icon: "subscript", format: "subscript"},
                {title: "Code", icon: "code", format: "code"}
            ]},
            {title: "Blocks", items: [
                {title: "Paragraph", format: "p"},
                {title: "Blockquote", format: "blockquote"},
                {title: "Div", format: "div"},
                {title: "Pre", format: "pre"}
            ]},
            {title: "Alignment", items: [
                {title: "Left", icon: "alignleft", format: "alignleft"},
                {title: "Center", icon: "aligncenter", format: "aligncenter"},
                {title: "Right", icon: "alignright", format: "alignright"},
                {title: "Justify", icon: "alignjustify", format: "alignjustify"}
            ]}
        ]
    });

// INITIALISATION TINYMCE for episode title
    tinymce.init({
        selector: '#mytexttitle',
        language: 'fr_FR',
        browser_spellcheck: true,
        contextmenu: false,


        style_formats: [
            {title: "Headers", items: [
                {title: "Header 1", format: "h1"},
                {title: "Header 2", format: "h2"},
                {title: "Header 3", format: "h3"},
                {title: "Header 4", format: "h4"},
                {title: "Header 5", format: "h5"},
                {title: "Header 6", format: "h6"}
            ]},
            {title: "Inline", items: [
                {title: "Bold", icon: "bold", format: "bold"},
                {title: "Italic", icon: "italic", format: "italic"},
                {title: "Underline", icon: "underline", format: "underline"},
                {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                {title: "Superscript", icon: "superscript", format: "superscript"},
                {title: "Subscript", icon: "subscript", format: "subscript"},
                {title: "Code", icon: "code", format: "code"}
            ]},
            {title: "Blocks", items: [
                {title: "Paragraph", format: "p"},
                {title: "Blockquote", format: "blockquote"},
                {title: "Div", format: "div"},
                {title: "Pre", format: "pre"}
            ]},
            {title: "Alignment", items: [
                {title: "Left", icon: "alignleft", format: "alignleft"},
                {title: "Center", icon: "aligncenter", format: "aligncenter"},
                {title: "Right", icon: "alignright", format: "alignright"},
                {title: "Justify", icon: "alignjustify", format: "alignjustify"}
            ]}
        ]
    });


// INITIALISATION MODALS CONFIRMATION
$(document).ready(function(){
    $('.modal').modal();
  });

  
// UPDATE EPISODES
// INITIALISATION TINYMCE for episode title
tinymce.init({
    selector: '.mytexttitleUpdate',
    language: 'fr_FR',
    browser_spellcheck: true,
    contextmenu: false,

    style_formats: [
        {title: "Headers", items: [
            {title: "Header 1", format: "h1"},
            {title: "Header 2", format: "h2"},
            {title: "Header 3", format: "h3"},
            {title: "Header 4", format: "h4"},
            {title: "Header 5", format: "h5"},
            {title: "Header 6", format: "h6"}
        ]},
        {title: "Inline", items: [
            {title: "Bold", icon: "bold", format: "bold"},
            {title: "Italic", icon: "italic", format: "italic"},
            {title: "Underline", icon: "underline", format: "underline"},
            {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
            {title: "Superscript", icon: "superscript", format: "superscript"},
            {title: "Subscript", icon: "subscript", format: "subscript"},
            {title: "Code", icon: "code", format: "code"}
        ]},
        {title: "Blocks", items: [
            {title: "Paragraph", format: "p"},
            {title: "Blockquote", format: "blockquote"},
            {title: "Div", format: "div"},
            {title: "Pre", format: "pre"}
        ]},
        {title: "Alignment", items: [
            {title: "Left", icon: "alignleft", format: "alignleft"},
            {title: "Center", icon: "aligncenter", format: "aligncenter"},
            {title: "Right", icon: "alignright", format: "alignright"},
            {title: "Justify", icon: "alignjustify", format: "alignjustify"}
        ]}
    ]
});

tinymce.init({
    selector: '.mytextareaUpdate',
    language: 'fr_FR',
    browser_spellcheck: true,
    contextmenu: false,
    height : 450,

    style_formats: [
        {title: "Headers", items: [
            {title: "Header 1", format: "h1"},
            {title: "Header 2", format: "h2"},
            {title: "Header 3", format: "h3"},
            {title: "Header 4", format: "h4"},
            {title: "Header 5", format: "h5"},
            {title: "Header 6", format: "h6"}
        ]},
        {title: "Inline", items: [
            {title: "Bold", icon: "bold", format: "bold"},
            {title: "Italic", icon: "italic", format: "italic"},
            {title: "Underline", icon: "underline", format: "underline"},
            {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
            {title: "Superscript", icon: "superscript", format: "superscript"},
            {title: "Subscript", icon: "subscript", format: "subscript"},
            {title: "Code", icon: "code", format: "code"}
        ]},
        {title: "Blocks", items: [
            {title: "Paragraph", format: "p"},
            {title: "Blockquote", format: "blockquote"},
            {title: "Div", format: "div"},
            {title: "Pre", format: "pre"}
        ]},
        {title: "Alignment", items: [
            {title: "Left", icon: "alignleft", format: "alignleft"},
            {title: "Center", icon: "aligncenter", format: "aligncenter"},
            {title: "Right", icon: "alignright", format: "alignright"},
            {title: "Justify", icon: "alignjustify", format: "alignjustify"}
        ]}
    ]
});



// MESSAGE FLASH
$('#alert_close').click(function(){
    $("#alert_box").fadeOut( "slow", function() {});
});

$('#alert').delay(3000).fadeOut("slow", function() {});


// MODAL CONFIRM
$(document).ready(function(){
    $('.modal').modal();
});