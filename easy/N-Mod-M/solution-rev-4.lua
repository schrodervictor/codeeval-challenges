-- Loop through the lines
for line in io.lines(arg[1]) do

    -- Split the string at the comma
    N, M = line:match("([^,]+),([^,]+)")

    -- Convert the strings to numbers
    N, M = tonumber(N), tonumber(M)

    -- How many Ms fits in one N?
    maxMs = math.floor(N/M)

    -- Calculate the modulo checking the difference
    modulo = N - maxMs*M

    -- Output the result
    io.write(modulo .. "\n")
end
