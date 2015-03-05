for line in io.lines(arg[1]) do
    io.write(tonumber(line, 16) .. "\n")
end
