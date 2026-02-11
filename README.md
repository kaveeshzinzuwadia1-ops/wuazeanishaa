# Romantic Virtual Scrapbook - Complete Package

## Contents
This folder contains all files needed to run the romantic virtual scrapbook website:

### HTML Pages
- `code.html` - Homepage with all navigation and countdown
- `missme.html` - "You miss me" letter page with music player
- `youresad.html` - "You're sad" comfort page with music player
- `wehungup.html` - "We hung up" letter page with music player and voice recording
- `cs.html` - "Can't sleep" meditation page with music player
- `pihoy.html` - Photo gallery with music player
- `bl.html` - "Things to do with me" bucket list
- `hwm.html` - "How we met" story page
- `wtgot.html` - "Ways to grow old together" dreams page
- `vr.html` - Voice recording page for your voice notes
- `vr_other.html` - Voice recording page template (optional)

### Audio Files
- `SpotiDownloader.com - Lover - Taylor Swift.mp3` - For missme.html
- `Weightless_spotdown.org.mp3` - For youresad.html
- `Only_spotdown.org.mp3` - For wehungup.html
- `Nightbook_spotdown.org.mp3` - For cs.html
- `Until I Found You_spotdown.org.mp3` - For pihoy.html
- Other audio files for various pages

### Images
- `hwm.PNG` - How we met image
- `pihou.PNG` - Photo gallery cover
- `image.png` - Things to do cover
- All JPG and JPEG files - Photos and memories

### Backend Files (Optional - for voice recording)
- `save_voice_note.php` - Handles voice note saving (requires PHP server)
- `save_voice_note_other.php` - Template for other person's voice notes

## How to Use

### Option 1: Static Website (No Voice Recording)
1. Upload all files to your web hosting
2. Open `code.html` in your browser
3. All navigation and music players will work

### Option 2: With Voice Recording Feature
1. Upload all files to a PHP-enabled server
2. Create a folder called `voice_notes` in the same directory
3. Make sure the `voice_notes` folder has write permissions (chmod 755)
4. Open `code.html` in your browser
5. Voice recording will save to the `voice_notes` folder

## Features
✅ Countdown to Valentine's Day
✅ Interactive photo gallery with music
✅ Multiple themed letter pages
✅ Working audio players with timeline seeking
✅ Voice recording system
✅ Beautiful glass morphism design
✅ Responsive mobile-friendly layout
✅ Dark/Light mode support

## Notes
- All music files are included
- All images are included
- If you're not using voice recording, you can delete the `.php` files
- Make sure to keep all files in the same folder
- Do not rename the HTML files unless you update all internal links

## Support
For any issues with:
- Music not playing: Verify audio files are in the same directory
- Voice recording not working: Make sure you're on a PHP server and voice_notes folder exists
- Images not showing: Ensure image files have correct names matching the HTML references

---
Created with ❤️ - Your Virtual Love Scrapbook
