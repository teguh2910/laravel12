// Extract and validate JavaScript from edit.blade.php

// This is just for syntax checking
const fs = require('fs');
const content = fs.readFileSync('resources/views/documents/edit.blade.php', 'utf8');

// Simple validation to find try blocks
const tryMatches = content.match(/try\s*{/g) || [];
const catchMatches = content.match(/}\s*catch/g) || [];
const finallyMatches = content.match(/}\s*finally/g) || [];

console.log('Try blocks found:', tryMatches.length);
console.log('Catch blocks found:', catchMatches.length); 
console.log('Finally blocks found:', finallyMatches.length);

// Basic syntax validation for common issues
const lines = content.split('\n');
let openTryBlocks = 0;
let openBraces = 0;
let inScript = false;

for (let i = 0; i < lines.length; i++) {
    const line = lines[i];
    
    if (line.includes('<script>')) inScript = true;
    if (line.includes('</script>')) inScript = false;
    
    if (inScript) {
        if (line.includes('try {')) {
            openTryBlocks++;
        }
        if (line.includes('} catch')) {
            openTryBlocks--;
        }
        if (line.includes('} finally')) {
            openTryBlocks--;
        }
        
        // Count braces
        openBraces += (line.match(/{/g) || []).length;
        openBraces -= (line.match(/}/g) || []).length;
    }
}

console.log('Unclosed try blocks:', openTryBlocks);
console.log('Unmatched braces in script:', openBraces);

if (openTryBlocks > 0) {
    console.log('ERROR: Found unclosed try blocks!');
}
