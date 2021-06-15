using System;


public class Exercise50
{  
   public static void Main() 
      {
         int[] nums = {5,4,3};
         Console.WriteLine("\nArray1: [{0}]", string.Join(", ", nums));
         var temp = nums[0];
            for (var i = 0; i < nums.Length - 1; i++)
            {
                nums[i] = nums[i + 1];
            }
            nums[nums.Length - 1] = temp;
            Console.WriteLine("\nAfter rotating array becomes: [{0}]", string.Join("", nums));
         
    } 
}