
 const themeStyle = document.querySelector('#theme-style');
 const themes     = document.querySelectorAll('.theme-dot');
 let theme        = localStorage.getItem('theme');
window.onload =()=>{

    console.log(theme);
    if(theme == null)
        setTheme('light');
    else
        setTheme(theme);

    themes.forEach(theme=>{
        theme.addEventListener('click',function(){
                let mode = this.dataset.mode
                setTheme(mode);
        });
    });
}
console.log(themeStyle);
function setTheme(mode){
    if( mode  == 'light')
        themeStyle.href="css/app.css";

    if( mode == 'green')
        themeStyle.href="css/green.css";

    if( mode == 'blue')
        themeStyle.href="css/blue.css";

    if( mode == 'purple')
        themeStyle.href="css/purple.css";

    localStorage.setItem('theme',mode);
}
