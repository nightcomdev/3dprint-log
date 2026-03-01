# 3D Printer Maintenance Log
It's a simple Maintenance Log sheet writen in HTML/CSS/PHP and using `json` file for saving data, `json` file can be exported and imported if needed from GUI interface. Project is based on BambuLab P2S printer and can miss some of maintenance that is used on other brands of 3D printers.

## Languages support
- English
- Polish

You can create your own language by creating `json` file and adding line to `index.html` for example if we want to add Russian language:

1. Copy `lang_en.json` and rename it to `lang_ru.json`
2. Translate what is needed to Russian language
```
   "subhead": "Комплексный журнал обслуживания 3D-принтеров",
    "printerLabel": "🖨️ Название принтера",
    "hoursLabel": "⏱️ Часы (время печати)",
```
4. Edit file `index.html` and find line
```
   <select class="lang-select" id="langSelect">
    <option value="en">English 🇬🇧</option>
    <option value="pl">Polski 🇵🇱</option>
    </select>
```    
6. Add ```<option value="ru">Русский 🇷🇺</option>``` before ```</select>``` like this:
```
   <select class="lang-select" id="langSelect">
    <option value="en">English 🇬🇧</option>
    <option value="pl">Polski 🇵🇱</option>
    <option value="ru">Русский 🇷🇺</option>
   </select>
```

## Requirements
- Server WWW Apache/Nginx etc.
- PHP installed

## Images of Main Page and separate history log.
![Screenshot of a main page](/images/sc1.png)

![Screenshot of a specific maintaenance from history](/images/sc2.png)
