-- Loop through the lines
for line in io.lines(arg[1]) do
    -- Output the number converted to base 10
    io.write(tonumber(line, 16) .. "\n")
end
